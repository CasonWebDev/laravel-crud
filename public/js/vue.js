
Vue.component('product', {
    props: [
        'qty',
        'prodid',
        'price'
    ],
    methods: {
        prod: function(){
            this.$emit('prod',this.qty,this.prodid,this.price)
        }
    },
    mounted(){
        this.prod()
    }
});

var app = new Vue({
    el: '#app',
    data: {
        quantity: [],
        fields: [],
        price: [],
        totalbrt: [],
        total: ''
    },
    methods: {
        totalprod: function (id, prc) {
            this.totalbrt[id] = prc * this.quantity[id];
            this.price[id] = this.totalbrt[id].toLocaleString('pt-BR', { style: 'currency', currency: 'BRL', minimumFractionDigits: 2 });
            total = this.totalbrt.reduce((a, b) => a + b, 0);
            this.total = total.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL', minimumFractionDigits: 2 });
        },
        addprod: function (qt, id, prc) {
            console.log(qt);
            this.quantity[id] = qt;
            this.totalbrt[id] = qt * prc;
            this.price[id] = this.totalbrt[id].toLocaleString('pt-BR', { style: 'currency', currency: 'BRL', minimumFractionDigits: 2 });
            total = this.totalbrt.reduce((a, b) => a + b, 0);
            this.total = total.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL', minimumFractionDigits: 2 });
        }
    }
  })

