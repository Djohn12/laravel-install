<template>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card">
                <div class="card-header">
                    <span>{{ thisCategory.name }}</span>
                    <b-btn size="sm" variant="outline-primary" @click="add_panel = !add_panel">
                        <i class="fas fa-plus"></i>
                    </b-btn>
                </div>
                <!-- Composant permettant le rajout de lien dans la présente catégorie -->
                <div v-if="add_panel" class="list-group list-group-flush">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon">@</div>
                        <input @keydown.enter="add_link()" v-model="link_url" type="text" class="form-control" placeholder="Enter you link address"/>
                    </div>
                </div>

                <ul class="list-group list-group-flush">
                    <!-- <li v-for="link in get_links()" @delete="del_link" :key="link.id" class="list-group-item">
                        <a :href="link.href" target="_blank">{{ link.name }}</a>
                        <button @click="delete_link(link)" class="btn btn-outline-danger btn-sm">x</button>
                    </li> -->
                    <Link v-for="link in get_links()" :key="link.id" :link="link" @delete_link="del_link(link)"/>
                </ul>
            </div>
        </div>

</template>

<script>
    import Link from './Link.vue'

    export default {
        name: 'Category',
        props: {
            thisCategory: Object,
            board: Object,
        },
        components: {
            Link
        },
        data() {
            return {
                add_panel: false,
                link_url: '',
            }
        },
        methods: {
            get_links(){
                return this.board.links.filter(link => ( link.category_id === this.thisCategory.id ))
            },
            add_link(){
                // La fonction commence par faire un fetch sur l'url entrée
                fetch(link_url)
                    // Elle traite ensuite la réponse du serveur distant et la retourne sous forme de html
                    .then(res => res.text())
                    // Après ce traitement nous allons éxécuter des actions en utilisant le html.
                    .then(html => {
                        // Un coup de parser pour récupérer la balise title.
                        // ( Je n'ai pas encore trouvé de bonne méthode pour trouver l'icone )
                        const doc = new DOMParser().parseFromString(html, "text/html");
                        let icon = '';
                        const title = doc.querySelectorAll('title')[0];

                        // On ajoute le lien à l'array contenant les liens
                        this.board.links.push({
                            // petit algo pour incrémenter les id à la manière de mysql
                            // ---> Récupère l'id de la dernière entrée du la liste et incrémente de 1
                            id: this.board.links[this.board.links.length - 1].id + 1,
                            category_id: this.thisCategory.id,
                            name:this.link_url,
                            href:this.link_url,
                            icon:icon,
                            title:title
                        })
                        // Nous effaçons cette variable pour remettre l'input à vide et repartir du bon pied pour une nouvelle entrée
                        this.link_url = ''
                    })
                    .catch( e => console.log(e) )
            },
            del_link(link_to_del){
                this.board.links = this.board.links.filter(link => link.id !== link_to_del.id)
            }
        }
    }

</script>


<style>

</style>