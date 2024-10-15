<div x-data="checkAll">
    <input x-ref="selectAllCheckbox" @change="handleCheck" type="checkbox" class="rounded border-gray-300 shadow">
</div>
@script
<script !src="">
    Alpine.data('checkAll', () => {
        return {
            init() {
                this.$wire.$watch('selectedOrdersIds', () => {
                    this.updateCheckAllState()
                })
                this.$wire.$watch('ordersIdsPerPage', () => {
                    this.updateCheckAllState()
                })
            },
            updateCheckAllState() {
                if (this.pageIsSelectedAll()) {
                    this.$refs.selectAllCheckbox.indeterminate = false
                    this.$refs.selectAllCheckbox.checked = true
                } else if (this.pageIsUnselectedAll()) {
                    this.$refs.selectAllCheckbox.indeterminate = false
                    this.$refs.selectAllCheckbox.checked = false
                } else {
                    this.$refs.selectAllCheckbox.checked = false
                    this.$refs.selectAllCheckbox.indeterminate = true
                }
            },
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
            },
            pageIsSelectedAll() {
                return this.$wire.ordersIdsPerPage.every(id => this.$wire.selectedOrdersIds.includes(id))
            },
            pageIsUnselectedAll() {
                return this.$wire.selectedOrdersIds.length === 0;
            }
        }
    })
</script>
@endscript
