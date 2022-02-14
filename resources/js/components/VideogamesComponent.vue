<template>
    <div id="videogames-table">
        <h1>Videogames</h1>
        <table border="1" >
            <tr>
                <th class="p-2">Title</th>
                <th class="p-2">Subtitle</th>
                <th class="p-2">Rating</th>
                <th v-if="user" class="p-2">Action</th>
            </tr>

            <tr v-for="videogame,i in videogames" :key="i">
                <td class="p-2">{{ videogame.title }}</td>
                <td class="p-2">{{ videogame.subtitle }}</td>
                <td class="p-2">{{ videogame.rating }}</td>
                <td v-if="user" class="p-2">
                    <button @click="videogameDelete(videogame.id)" class="btn btn-danger">DELETE</button>
                </td>
            </tr>
        </table>
    </div>
</template>

<script>
    export default {
        data() {

            return {
                videogames: [],
            }
        },
        props: {
            user: String,
        },
        methods: {

            videogameDelete(id) {
                // chiamata axios per eliminare un videogame 
                axios.get(`/api/videogame/delete/${id}`)
                     .then(r => {
                         let index = this.getIndexById(id);
                         this.videogames.splice(index, 1);
                     })
                     .catch(e => console.log('e', e));
            },

            // metodo per recuperare l'id del videogame che sarà eliminato
            getIndexById(id) {
                for(let x = 0; x < this.videogames.length; x++ ) {

                    let videogame = this.videogame[x];
                    if(videogame.id == id) 
                        return x;
                }
                return -1;
            },
        },
        mounted() {

            // chiamata axios che mi restituisce l'elenco dei videogiochi
            axios.get('/api/videogames/index')
                 .then(r => this.videogames = r.data)
                 .catch(e => console.log(e));
        }
    }
</script>
