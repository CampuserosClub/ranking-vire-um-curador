<script>
    export default {
        data () {
            return {
                tags: []
            }
        },

        methods: {
            toggleSelection (tag) {
                this.selected(tag)
                    ? this.tags = this.tags.filter(val => val !== tag)
                    : this.tags.push(tag)

                this.$bus.$emit('filter-tags', this.tags)
            },
            selected (tag) {
                return this.tags.includes(tag)
            }
        }
    }
</script>