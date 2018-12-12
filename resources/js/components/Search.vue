<template>
    <div class="search-section text-white p-6 align-content-center">
        <div class="flex h-16">
            <input class="rounded-full border border-white text-blue text-4xl w-3/4" type="text" v-model="url">
            <a href="#" @click.prevent="getContent" class="rounded-full border border-white text-white text-4xl px-4 hover:bg-blue hover:no-underline w-1/4 text-center">Search</a>
        </div>
        <div class="flex  p-4">
            <div class="w-1/2">
                <img :src="product.image" alt="">
            </div>
            <div class="w-1/2 text-center">
                <h1 class="text-3xl mb-6">{{product.name}}</h1>
                <h2>{{product.price}}</h2>
            </div>
        </div>
    </div>
</template>

<script>
    import cheerio from 'cheerio';

    export default {
        data() {
            return {
                url: "https://bg.sportsdirect.com/karrimor-casual-mens-snow-boots-143047?colcode=14304705",
                cheerio: cheerio,
                $: '',
                html: '',
                product: {
                    name: '',
                    price: '',
                    image: ''
                }
            }
        },
        mounted() {
            console.log('as')
        },
        methods: {
            getContent() {

                axios.post('api/content', {
                    url: this.url
                }).then(({data}) => {
                    this.html = data.data;
                    this.$ = this.cheerio.load(this.html);
                    this.product.name = this.$('#lblProductName').text();
                    this.product.price = this.$('.productHasRef').text();
                    this.product.image = this.$('#imgProduct').attr('src')
                });

                this.content = $('.apple').text()
            }
        }
    }
</script>
