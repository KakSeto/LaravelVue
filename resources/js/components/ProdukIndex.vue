<template>
    <div class='container py-4'>
        <div class='row justify-content-center'>
            <div class='col-md-8'>
            <div class='card'>
                <div class='card-header'>All Produk</div>
                <div class='card-body'>
                    <router-link :to="{ name: 'create' }" class="btn btn-primary">Create new produk</router-link>
                    <br/>
                    <br/>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="50" class="text-center">No</th>
                                    <th>Nama</th>
                                    <th>Merk</th>
                                    <th>Storage</th>
                                    <th>Tahun</th>
                                    <th>Garansi</th>
                                    <th>Status</th>
                                    <th width="200" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(produk, index) in produks" :key="produk.id">
                                    <td width="50" class="text-center">{{ index + 1 }}</td>
                                    <td>{{ produk.nama }}</td>
                                    <td>{{ produk.merk }}</td>
                                    <td>{{ produk.storage }}</td>
                                    <td>{{ produk.tahun }}</td>
                                    <td>{{ produk.garansi }}</td>
                                    <td>{{ produk.status }}</td>
                                    <td width="200" class="text-center">
                                        <div class="btn-group">
                                            <router-link :to="{name: 'show', params: { id: produk.id }}" class="btn btn-primary">Detail</router-link>
                                            <router-link :to="{name: 'edit', params: { id: produk.id }}" class="btn btn-success">Edit</router-link>
                                            <button class="btn btn-danger" @click = "deletePost(produk.id)">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
</template>
 
<script>
  export default {
      data() {
        return {
          produks: []
        }
      },
      created() {
        let uri = 'api/produks';
        this.axios.get(uri).then(response => {
            this.produks = response.data;
        });
    },
    methods: {
        deletePost(id)
        {
            this.$swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Jika kamu hapus, maka data tidak akan kembali lagi.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus Deh',
                cancelButtonText: 'Nggak Jadi'
                }).then((result) => {
                if (result.value) {
                    this.$swal.fire({
                        title: 'Success!',
                        text: 'produk deleted successfully',
                        icon: 'success',
                        timer: 1000
                    });
                    let uri = `api/produk/delete/${id}`;
                    this.axios.delete(uri).then(response => {
                        this.produks.splice(this.produks.indexOf(id), 1);
                    });
                    console.log("Deleted produk with id ..." +id);
                }
            })
        }
    }
  }
</script>