<template>
    <div class='container py-4'>
        <div class='row justify-content-center'>
            <div class='col-md-6'>
                <div class='card'>
                    <div class='card-header'>Detail Produk</div>
                    <div class='card-body'>
                        <div class='form-group'>
                            <label htmlFor='nama'>Nama</label>
                            <input type="text" class="form-control" id="nama" v-model="produk.nama" disabled>
                        </div>
                        <div class='form-group'>
                                <label htmlFor='merk'>Merk</label>
                                <input type="text" class="form-control" id="merk" v-model="produk.merk" disabled>
                            </div>
                            <div class='form-group'>
                                <label htmlFor='storage'>Storage</label>
                                <input type="text" class="form-control" id="storage" v-model="produk.storage" disabled>
                            </div>
                            <div class='form-group'>
                                <label htmlFor='tahun'>Tahun</label>
                                <input type="text" class="form-control" id="tahun" v-model="produk.tahun" disabled>
                            </div>
                            <div class='form-group'>
                                <label htmlFor='garansi'>Garansi</label>
                                <input type="text" class="form-control" id="garansi" v-model="produk.garansi" disabled>
                            </div>
                            <div class='form-group'>
                                <label htmlFor='status'>Status</label>
                                <input type="text" class="form-control" id="status" v-model="produk.status" disabled>
                            </div>
                        <div class='form-group'>
                            <router-link :to="{ name: 'home' }" class="btn btn-secondary">Back</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
        return {
            produk:{},
        }
    },
    created() {
        let uri = `/api/produk/show/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.produk = response.data;
        });
    },
    method: {
 
    }
  }
</script>