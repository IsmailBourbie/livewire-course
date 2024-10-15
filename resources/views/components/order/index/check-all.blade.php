<div x-data="checkAll">
    <input @change="handleCheck" type="checkbox" class="rounded border-gray-300 shadow">
</div>
@script
<script !src="">
    Alpine.data('checkAll', () => {
        return {
            handleCheck(e) {
                e.target.checked ? this.selectAll() : this.unselectAll()
            },
            selectAll() {
                this.$wire.ordersIdsPerPage.forEach(id => {
                    if (this.$wire.selectedOrdersIds.includes(id)) return

                    this.$wire.selectedOrdersIds.push(id)
                })
            },
            unselectAll() {
                this.$wire.selectedOrdersIds = [];
            }
        }
    })
</script>
@endscript
