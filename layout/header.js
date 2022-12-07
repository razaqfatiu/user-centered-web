const fileValidation = (e) => {
  if (this.disabled) return;
  const files = e.target.files || e.dataTransfer.files;
  console.log(files)
  if (files.length > 4) {
    alert('You are only allowed to upload a maximum of 3 files at a time');
  }
  if (!files.length) return;
  for (let i = 0; i < Math.min(files.length, 2); i++) {
    this.fileCallback(files[i]);
  }
}
