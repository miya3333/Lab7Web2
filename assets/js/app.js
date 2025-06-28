const { createApp } = Vue

// tentukan lokasi API REST End Point
const apiUrl = 'http://localhost:8080/lab11_ci/ci4/public/'

createApp({
    data() {
        return {
            artikel: '',
            formData: {
                id: null,
                judul: '',
                isi: '',
                status: 0
            },
            showForm: false,
            formTitle: 'Tambah Data',
            formTitles: [{ text: 'Tambah Datas' }],
            statusOptions: [
                { text: 'Draft', value: 0 },
                { text: 'Publish', value: 1 },
            ],
        }
    },
    mounted() {
        this.loadData()

    },
    methods: {
        loadData() {
            axios.get(apiUrl + '/post')
                .then(response => {
                    this.artikel = response.data.artikel
                })
                .catch(error => console.log(error))
        },
        tambah() {
            this.showForm = true
            this.formTitle = 'Tambah Data'
            this.formData = {
                id: null,
                judul: '',
                isi: '',
                status: 0
            }
        },
        hapus(index, id) {
            if (confirm('Yakin menghapus data?')) {
                axios.delete(apiUrl + '/post/' + id)
                    .then(response => {
                        this.artikel.splice(index, 1)
                    })
                    .catch(error => console.log(error))
            }
        },
        edit(data) {
            this.showForm = true;
            this.formTitle = 'Ubah Data'
            this.formData = {
                id: data.id,
                judul: data.judul,
                isi: data.isi,
                status: data.status
            };
            console.log(data)
            console.log(this.formData)
        },
        saveData() {
            if (this.formData.id) {
                axios.put(apiUrl + '/post/' + this.formData.id, this.formData)
                    .then(response => {
                        this.loadData()
                    })
                    .catch(error => console.log(error))
                console.log('Update item:', this.formData);
            } else {
                axios.post(apiUrl + '/post', this.formData)
                    .then(response => {
                        this.loadData()
                    })
                    .catch(error => console.log(error))
                console.log('Tambah item:', this.formData);
            }
            // Reset form data
            this.formData = {
                id: null,
                judul: '',
                isi: '',
                status: 0
            };
            this.showForm = false;
        },
        statusText(status) {
            if (!status) return ''
            return status == 1 ? 'Publish' : 'Draft'
        }
    },
}).mount('#app')
