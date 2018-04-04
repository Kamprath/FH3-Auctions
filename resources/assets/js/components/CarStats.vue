<template>
    <nav class="level">
        <div class="level-item has-text-centered">
            <div>
                <p class="heading">Avg. Buy Price</p>
                <p class="title">${{ Number(avgBuyPrice).toLocaleString() }}</p>
            </div>
        </div>
        <div class="level-item has-text-centered">
            <div>
                <p class="heading">Avg. Sell Price</p>
                <p class="title">${{ Number(avgSellPrice).toLocaleString() }}</p>
            </div>
        </div>
        <div class="level-item has-text-centered">
            <div>
                <p class="heading">ROI</p>
                <p class="title">{{ Number(roi * 100).toFixed(1) }}%</p>
            </div>
        </div>
        <div class="level-item has-text-centered">
            <div>
                <p class="heading">Total Profit</p>
                <p class="title">${{ Number(profit).toLocaleString() }}</p>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        props: ['car'],

        computed: {
            avgBuyPrice() {
                return this.calculateAvg('buy_price');
            },

            avgSellPrice() {
                return this.calculateAvg('sell_price');
            },

            revenue() {
                return this.calculateSum('sell_price');
            },

            cost() {
                return this.calculateSum('buy_price');
            },

            roi() {
                return (this.revenue - this.cost) / this.cost;
            },

            profit() {
                return Math.floor(
                    this.revenue - this.cost
                );
            }
        },

        methods: {
            calculateAvg(propertyName) {
                let sum = 0, count = 0;

                this.car.auctions.forEach((auction) => {
                    if (auction[propertyName] <= 0) {
                        return;
                    }

                    sum += auction[propertyName];
                    count++;
                });

                return Math.ceil(sum / count);
            },

            calculateSum(propertyName) {
                let sum = 0;

                this.car.auctions.forEach((auction) => {
                    sum += auction[propertyName];
                });

                return sum;
            }
        },
    }
</script>