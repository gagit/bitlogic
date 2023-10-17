<script>

import Upload from "./Upload.vue";

export default {
    components: {Upload},
    name: 'CsvToText',
    data: () => ({
        counter:0,
    }),
    methods: {
        onFileChange(e) {
            this.counter++;

        },
    }
}
</script>

<template>
    <div class="csvToText-vue-component">
        <upload></upload>
        <div class="container">
            <div class="row">
                <label>Cols to use (separated by comma)</label>
                <div class="col-12" style="margin: auto; ">
                    <input type="text" id="csv_cols_to_use" name="csv_to_txt[csv_cols_to_use]" class="form-control"></input>
                </div>
            </div>
            <div class="row">
                <label>Text to Complete</label>
                <div class="col-12" style="margin: auto; ">
                    <textarea id="csv_to_txt_text_to_complete" name="csv_to_txt[text_to_complete]" class="form-control"></textarea>
                </div>
            </div>
            <div class="row">
                <label>Text Result</label>
                <div class="col-12" style="margin: auto; ">
                    <textarea id="csv_to_txt_textProccesed" name="csv_to_txt[textProccesed]" class="form-control"></textarea>
                </div>
            </div>
        </div>
    </div>
</template>

<style >
@import'bootstrap/dist/css/bootstrap.css';
</style>
