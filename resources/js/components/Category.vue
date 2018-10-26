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
                data: null,
                error: null
            }
        },
        methods: {
            get_links(){
                return this.board.links.filter(link => ( link.category_id === this.thisCategory.id ))
            },
            add_link(){
                    this.promise('url')
                    let icon = '';
                    let title = this.data.title;

                    this.board.links.push({
                        id: this.board.links[this.board.links.length - 1].id + 1,
                        category_id: this.thisCategory.id,
                        name:this.link_url,
                        href:this.link_url,
                        icon:icon,
                        title:title
                    })
                    this.link_url = ''
            },
            promise(url){
                fetch(url)
                    .then(res => res.json())
                    .then(function(data){
                        this.data = data.results
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