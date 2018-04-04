<template>

    <div>
        <section class="hero is-dark">
            <div class="hero-body">
                <div class="container">
                    <div class="control has-icons-left has-icons-right">
                        <input id="search-cars"
                               class="input is-medium"
                               type="text"
                               placeholder="Search cars..."
                               v-model="searchText"
                               autofocus>
                        <span class="icon is-small is-left"><i class="fas fa-car"></i></span>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <table class="table cars">
                    <thead>
                        <tr>
                            <th>Car</th>
                            <th>Price</th>
                            <th class="has-text-centered">Auctions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="car in cars" v-bind:class="{ 'hidden': !isCarVisible(car.year, car.make, car.model) }">
                            <td>
                                <a :href="'/cars/' + car.id">
                                    {{ car.year }} {{ car.make }} {{ car.model }}
                                </a>
                            </td>
                            <td>${{ Number(car.price).toLocaleString() }}</td>
                            <td class="has-text-centered">{{ car.auctions.length }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

</template>

<style lang="scss" scoped>

    .hidden {
        display: none;
    }

</style>

<script>

    export default {

        props: ['cars'],

        data() {
            return { searchText: '' }
        },

        methods: {
            /**
             * Determine if a car should appear in the list.
             * @param {number} year
             * @param {string} make
             * @param {string} model
             * @returns {boolean}
             */
            isCarVisible(year, make, model) {
                return this.searchText === '' || this.searchText.toLowerCase().split(' ').every((word) => {
                    return (year + ' ' + make + ' ' + model).toLowerCase().indexOf(word) >= 0;
                });
            }
        }

    }

</script>