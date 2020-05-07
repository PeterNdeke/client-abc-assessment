<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Search For top Listed Exchanges
                    </div>

                    <div class="card-body">
                        <input
                            type="text"
                            v-model="query"
                            id="myInput"
                            placeholder="Search for FX Rate, Currencies.."
                        />

                        <ul id="myUL" v-if="results.length > 0 && query">
                            <li
                                v-for="result in results.slice(0, 10)"
                                :key="result.id"
                            >
                                <a :href="result.url"
                                    ><div
                                        v-text="result.searchable.exchange_rate"
                                    ></div
                                ></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
    },
    data() {
        return {
            query: null,
            results: []
        };
    },
    watch: {
        query(after, before) {
            this.searchFxs();
        }
    },
    methods: {
        searchFxs() {
            axios
                .get("fx-search", { params: { query: this.query } })
                .then(response => (this.results = response.data))
                .catch(error => {});
        }
    }
};
</script>

<style>
#myInput {
    background-image: url("/img/search.png"); /* Add a search icon to input */
    background-position: 10px 12px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 12px 20px 12px 40px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 12px; /* Add some space below the input */
}

#myUL {
    /* Remove default list styling */
    list-style-type: none;
    padding: 0;
    margin: 0;
}

#myUL li a {
    border: 1px solid #ddd; /* Add a border to all links */
    margin-top: -1px; /* Prevent double borders */
    background-color: #f6f6f6; /* Grey background color */
    padding: 12px; /* Add some padding */
    text-decoration: none; /* Remove default text underline */
    font-size: 18px; /* Increase the font-size */
    color: black; /* Add a black text color */
    display: block; /* Make it into a block element to fill the whole list */
}

#myUL li a:hover:not(.header) {
    background-color: #eee; /* Add a hover effect to all links, except for headers */
}
</style>
