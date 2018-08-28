<script>

    export default {

        props: ['attributes'],

        data() {
            return {
                editing: false,
                amount: this.attributes.amount,
                status: this.attributes.status
            };
        },

        methods: {
            update() {
                axios.patch('/items/' + this.attributes.id, {
                    amount: this.amount,
                    status: this.status
                });
                this.editing = false;
                flash('Updated!');
            }
        }

    }

</script>

<style>
    .update{
        border: 1px solid #cccccc;
        padding: 2px 5px;
        background: #5cd08d;
    }
</style>
