<script>

export default {
    name: 'Upload',
    data: () => ({
        counter:0,
    }),
    methods: {
        onFileChange(e) {
            this.counter++;
            // var files = e.target.files || e.dataTransfer.files;
            // if (!files.length)
            //     return;
            // this.createImage(files[0]);
        },
        // createImage(file) {
        //     var image = new Image();
        //     var reader = new FileReader();
        //     var vm = this;
        //
        //     reader.onload = (e) => {
        //         vm.image = e.target.result;
        //     };
        //     reader.readAsDataURL(file);
        // },
        // removeImage: function (e) {
        //     this.image = '';
        // }
    }
}
</script>

<template>
    <div class="upload-vue-component">
        <div class="container">
            <div class="row">
              <label>Select an csv file</label>
              <div class="col-10">
                  <input type="file" @change="onFileChange">
        <!--          {{ counter }}-->
              </div>
              <div class="2">
                  <button class="btn btn-outline-dark text-center" ><i class="fa fa-upload"></i> </button>
              </div>
          </div>
        </div>
    </div>
</template>

<style >
@import'bootstrap/dist/css/bootstrap.css';
</style>