<template>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <span>#{{ thisCategory.id }} : {{ thisCategory.name }}</span>
                    <b-btn size="sm" variant="outline-primary" @click="add_panel = !add_panel">
                        <i class="fas fa-plus"></i>
                    </b-btn>
                </div>
                <!-- Composant permettant le rajout de lien dans la présente catégorie -->
                <div v-if="add_panel" class="list-group list-group-flush">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon">@</div>
                        <input @keydown.enter="add_link()" type="text" class="form-control form-control-sm" placeholder="Enter you link address"/><i class="fas fa-plus"></i>
                    </div>
                </div>

                <ul class="list-group list-group-flush">
                    <!-- <li v-for="link in get_links()" @delete="del_link" :key="link.id" class="list-group-item">
                        <a :href="link.href" target="_blank">{{ link.name }}</a>
                        <button @click="delete_link(link)" class="btn btn-outline-danger btn-sm">x</button>
                    </li> -->
                    <Link v-for="link in get_links()" :key="link.id" :link="link" @delete_link="del_link(link.id)"/>
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
            }
        },
        methods: {
            get_links(){
                return this.board.links.filter(link => ( link.category_id === this.thisCategory.id ))
            },
            add_link(href){
                this.board.links.push({
                    category_id: this.thisCategory.id,
                    name:href,
                    href:href
                })
            },
            del_link(input_id){
                this.board.links = this.board.links.filter(link => link.id !== input_id)
            }
        }
    }

</script>


<style>

</style>