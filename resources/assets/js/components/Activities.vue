<script>
    import { isEmpty } from 'lodash'

    export default {
        data () {
            return {
                tags: []
            }
        },

        mounted () {
            this.$bus.$on('filter-tags', tags => this.tags = tags)
        },

        methods: {
            filter (tags) {
                if (isEmpty(this.tags)) return true

                const found = tags.some(tag => this.tags.includes(tag))

                return found
            }
        }
    }
</script>