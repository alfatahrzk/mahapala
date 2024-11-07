<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">Tambah Anggota</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Anggota</a></li>
        <li class="breadcrumb-item active" aria-current="page">
          Tambah Anggota
        </li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tambah Anggota Baru</h4>
          <p class="card-description">
            Harap perhatikan besar kecilnya huruf !
          </p>
          <form class="forms-sample" method="POST">
            <div class="form-group">
              <label for="nama">Nama Lengkap</label>
              <input
                type="text"
                class="form-control"
                id="nama"
                placeholder="Nama Lengkap"
                name="nama" />
            </div>
            <div class="form-group">
              <label for="lapang">Nama Lapang</label>
              <input
                type="text"
                class="form-control"
                id="lapang"
                placeholder="Nama Lapang"
                name="lapang" />
            </div>
            <div class="form-group">
              <label for="nim">NIM</label>
              <input
                type="text"
                class="form-control"
                id="nim"
                placeholder="NIM"
                name="nim" />
            </div>
            <div class="form-group">
              <label for="nim">Arti 2 Huruf akhir pada NIM</label>
              <input
                type="text"
                class="form-control"
                id="arti"
                placeholder="Arti NIM"
                name="arti" />
            </div>
            <div class="form-group">
              <label for="exampleSelectGender">Status</label>
              <select class="form-select" id="exampleSelectGender">
                <option>Anggota Muda</option>
                <option>Anggota Penuh</option>
                <option>Anggota Luar Biasa</option>
                <option>Anggota Kehormatan</option>
                <option>Anggota Simpatisan</option>
              </select>
            </div>

            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input
                type="text"
                class="form-control"
                id="alamat"
                placeholder="Alamat" />
            </div>
            <div class="form-group">
              <label for="telp">No. Telp</label>
              <input
                type="number"
                class="form-control"
                id="telp"
                placeholder="Nomor Telepon Aktif" />
            </div>
            <div class="form-group">
              <label for="exampleTextarea1">Deskripsi Tambahan</label>
              <textarea
                class="form-control"
                id="exampleTextarea1"
                rows="4"></textarea>
            </div>
            <div class="form-group">
              <label>Foto</label>
              <input
                type="file"
                name="img[]"
                class="file-upload-default" />
              <div class="input-group col-xs-12">
                <input
                  type="text"
                  class="form-control file-upload-info"
                  disabled
                  placeholder="Ekstensi yang diterima hanya: jpg, jpeg dan png" />

                <span class="input-group-append">
                  <button
                    class="file-upload-browse btn btn-gradient-info py-3"
                    type="button">
                    Unggah
                  </button>
                </span>
              </div>
            </div>
            <button type="submit" name="submit" class="btn btn-gradient-info me-2">
              Submit
            </button>
            <button class="btn btn-light">Cancel</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Wait for DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
      // Get form element
      const form = document.querySelector('.forms-sample');

      // Function to compress image
      async function compressImage(file) {
        return new Promise((resolve) => {
          const reader = new FileReader();
          reader.onload = function(e) {
            const img = new Image();
            img.onload = function() {
              const canvas = document.createElement('canvas');
              let width = img.width;
              let height = img.height;

              // Calculate new dimensions while maintaining aspect ratio
              const MAX_WIDTH = 1200;
              const MAX_HEIGHT = 1200;

              if (width > height) {
                if (width > MAX_WIDTH) {
                  height *= MAX_WIDTH / width;
                  width = MAX_WIDTH;
                }
              } else {
                if (height > MAX_HEIGHT) {
                  width *= MAX_HEIGHT / height;
                  height = MAX_HEIGHT;
                }
              }

              canvas.width = width;
              canvas.height = height;

              const ctx = canvas.getContext('2d');
              ctx.drawImage(img, 0, 0, width, height);

              // Start with high quality
              let quality = 0.9;
              let compressedFile = canvas.toDataURL('image/jpeg', quality);

              // Keep reducing quality until file size is under 1MB
              while (compressedFile.length > 1024 * 1024 && quality > 0.1) {
                quality -= 0.1;
                compressedFile = canvas.toDataURL('image/jpeg', quality);
              }

              // Convert base64 to Blob
              fetch(compressedFile)
                .then(res => res.blob())
                .then(blob => {
                  // Create a new File object
                  const compressedImageFile = new File([blob], file.name, {
                    type: 'image/jpeg',
                    lastModified: new Date().getTime()
                  });
                  resolve(compressedImageFile);
                });
            };
            img.src = e.target.result;
          };
          reader.readAsDataURL(file);
        });
      }

      // Handle form submission
      form.addEventListener('submit', async function(e) {
        e.preventDefault();

        // Get all form inputs
        const nama = document.getElementById('nama').value.trim();
        const lapang = document.getElementById('lapang').value.trim();
        const nim = document.getElementById('nim').value.trim();
        const arti = document.getElementById('arti').value.trim();
        const gender = document.getElementById('exampleSelectGender').value;
        const status = document.getElementById('exampleSelectGender').nextElementSibling.value;
        const alamat = document.getElementById('alamat').value.trim();
        const telp = document.getElementById('telp').value.trim();
        const deskripsi = document.getElementById('exampleTextarea1').value.trim();
        const fileInput = document.querySelector('.file-upload-default');

        // Validation flags
        let isValid = true;
        let errorMessage = '';

        // Validate required fields
        if (!nama) {
          errorMessage += 'Nama Lengkap harus diisi.\n';
          isValid = false;
        }

        if (!lapang) {
          errorMessage += 'Nama Lapang harus diisi.\n';
          isValid = false;
        }

        // Validate NIM
        if (!nim || !/^\d+$/.test(nim)) {
          errorMessage += 'NIM harus berupa angka.\n';
          isValid = false;
        }

        // Validate phone number
        if (!telp || !/^\d{10,13}$/.test(telp)) {
          errorMessage += 'Nomor Telepon harus valid (10-13 digit).\n';
          isValid = false;
        }

        // Validate file upload
        if (fileInput.files.length > 0) {
          const file = fileInput.files[0];
          const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];

          if (!allowedTypes.includes(file.type)) {
            errorMessage += 'File harus berformat jpg, jpeg, atau png.\n';
            isValid = false;
          }
        }

        // If validation fails, show error message
        if (!isValid) {
          alert(errorMessage);
          return;
        }

        // Create FormData object
        const formData = new FormData(form);

        // If there's an image file, compress it
        if (fileInput.files.length > 0) {
          try {
            // Show loading message
            const loadingMsg = document.createElement('div');
            loadingMsg.textContent = 'Sedang memproses gambar...';
            loadingMsg.style.color = 'blue';
            form.appendChild(loadingMsg);

            const compressedImage = await compressImage(fileInput.files[0]);

            // Remove the original file and add the compressed one
            formData.delete('img[]');
            formData.append('img[]', compressedImage);

            // Remove loading message
            form.removeChild(loadingMsg);
          } catch (error) {
            console.error('Error compressing image:', error);
            alert('Terjadi kesalahan saat memproses gambar.');
            return;
          }
        }

        // Send data to server using fetch
        fetch('proses_tambah.php', {
            method: 'POST',
            body: formData
          })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              alert('Data berhasil disimpan!');
              form.reset();
            } else {
              alert('Terjadi kesalahan: ' + data.message);
            }
          })
          .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat mengirim data.');
          });
      });

      // File upload preview functionality
      const fileUpload = document.querySelector('.file-upload-default');
      const fileUploadInfo = document.querySelector('.file-upload-info');
      const browseBtn = document.querySelector('.file-upload-browse');

      browseBtn.addEventListener('click', function() {
        fileUpload.click();
      });

      fileUpload.addEventListener('change', function() {
        if (this.files.length > 0) {
          fileUploadInfo.value = this.files[0].name;
        }
      });
    });
  </script>