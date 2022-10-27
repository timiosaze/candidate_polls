import axios from 'axios';

window.axios = axios;

export default () => ({
    init() {
        console.log('I am called automatically')
        this.getStates()
        setTimeout(() => {
            this.addValue()
          }, 1000);
    },
    open: false,
    data: [],
    getStates() {
        axios.get('http://127.0.0.1:8000/api/allstates')
        .then(response => this.data = response.data.data)
        .catch(error =>  console.log(error));
        
    },
    addValue() {
       this.data.forEach((x) => x.value = 50)
    },
    toggle() {
        this.open = ! this.open
    },
    
})