<script>
    import { isEmpty } from 'lodash'

    export default {
        data () {
            return {
                tags: [],
                search: ''
            }
        },

        mounted () {
            this.$bus.$on('filter-tags', tags => this.tags = tags)
        },

        methods: {
            filterByTag (tags) {
                if (isEmpty(this.tags)) return true

                return tags.some(tag => this.tags.includes(tag))
            },
            filterByTitle (title) {
                if (isEmpty(this.search)) return true

                return title.toLowerCase().includes(this.search.toLowerCase())
            }
        }
    }
</script>