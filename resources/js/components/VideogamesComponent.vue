<template>
    <div id="videogames-table">
        <h1>Videogames</h1>
        <table border="1" >
            <tr>
                <th class="p-2">title</th>
                <th class="p-2">subtitle</th>
                <th class="p-2">rating</th>
            </tr>

            <tr v-for="videogame,i in videogames" :key="i">
                <td class="p-2">{{ videogame.title }}</td>
                <td class="p-2">{{ videogame.subtitle }}</td>
                <td class="p-2">{{ videogame.rating }}</td>
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
        mounted() {

            // chiamata axios che mi restituisce l'elenco dei videogiochi
            axios.get('/api/videogames/index')
                 .then(r => this.videogames = r.data)
                 .catch(e => console.log(e));
        }
    }
</script>
