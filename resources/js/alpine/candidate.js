export default () => ({
    open: false,
    toggle() {
        this.open = ! this.open
    },
    setAttr(){
        this.$el.classList.remove("bg-white")
        this.$el.classList.add("ring-4", "ring-primary-700", "bg-primary-100")
        const getSiblings = node => [...node.parentNode.children].filter(c => c !== node)
        const siblings = getSiblings(this.$el)
        siblings.forEach(element => {
            if(element.classList.contains("ring-4","ring-primary-700","bg-primary-100"))
            {
                element.classList.remove("ring-4","ring-primary-700","bg-primary-100")
                element.classList.add("bg-white")
            }
        });
    },
    wireSet(id){
        this.$wire.set('candidate_id', id)
    },
    set(id){
        this.setAttr()
        setTimeout(() => this.wireSet(id), 3000);
    }
})
