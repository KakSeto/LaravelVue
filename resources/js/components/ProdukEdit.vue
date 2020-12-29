<template>
    <div class='container py-4'>
        <div class='row justify-content-center'>
            <div class='col-md-6'>
                <div class='card'>
                    <div class='card-header'>Edit produk</div>
                    <div class='card-body'>
                        <div class="alert alert-danger" v-if="errors.length">
                            <b>Terdapat kesalahan dalam input data:</b>
                            <ul>
                                <li v-for="error in errors" :key="error">{{ error }}</li>
                            </ul>
                        </div>
 
                        <form @submit.prevent="updateProduk">
                            <div class='form-group'>
                                <label htmlFor='nama'>Nama</label>
                                <input type="text" class="form-control" id="nama" v-model="produk.nama">
                            </div>
                            <div class='form-group'>
                                <label htmlFor='merk'>Merk</label>
                                <input type="text" class="form-control" id="merk" v-model="produk.merk">
                            </div>
                            <div class='form-group'>
                                <label htmlFor='storage'>Storage</label>
                                <input type="text" class="form-control" id="storage" v-model="produk.storage">
                            </div>
                            <div class='form-group'>
                                <label htmlFor='tahun'>Tahun</label>
                                <input type="text" class="form-control" id="tahun" v-model="produk.tahun">
                            </div>
                            <div class='form-group'>
                                <label htmlFor='garansi'>Garansi</label>
                                <input type="text" class="form-control" id="garansi" v-model="produk.garansi">
                            </div>
                            <div class='form-group'>
                                <label htmlFor='status'>Status</label>
                                <input type="text" class="form-control" id="status" v-model="produk.status">
                            </div>
                            <div class='form-group'>
                                <router-link :to="{ name: 'home' }" class="btn btn-secondary">Back</router-link>
                                  
                                  
                                <button class='btn btn-primary'>Create</button>
                            </div>
                        </form>
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
                errors: [],
                nama: null,
                merk: null,
                storage: null,
                tahun: null,
                garansi: null,
                status: null,
        }
    },
    created() {
        let uri = `/api/produk/edit/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.produk = response.data;
        });
    },
    methods: {
        updateProduk(e){
             
            if (this.$data.produk.nama != null && 
                    this.$data.produk.merk != null && 
                    this.$data.produk.storage != null &&
                    this.$data.produk.tahun != null &&
                    this.$data.produk.garansi != null &&
                    this.$data.produk.status != null) {
                 
                this.$swal.fire({
                    title: 'Success',
                    text: "Article created successfully",
                    icon: 'success',
                    timer: 1000
                });
                let uri = `/api/produk/update/${this.$route.params.id}`;
                this.axios.put(uri, this.produk).then((response) => {
                    this.$router.push({name: 'home'});
                });
                return true;
            }
 
 
            this.errors = [];
 
            if (!this.nama) {
                this.errors.push('Title wajib diisi !');
            }
            if (!this.merk) {
                this.errors.push('Content wajib diisi !');
            }
 
            e.preventDefault();
        }
    }
  }
</script>