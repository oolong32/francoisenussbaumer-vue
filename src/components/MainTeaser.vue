<template>
  <main id="index">
    <p v-if="auction_data && auction_data.status === 'Auktion beendet'">Auktion für dieses Bild beendet.</p>
    <p v-else-if="auction_data">Momentaner Preis: CHF {{ auction_data.bids.length ? auction_data.article.base_price + 10 : auction_data.article.start_price }}.—</p>
    <!-- {# Bis Auction wieder geht, ausblenden -->
    <!-- <p v-else>Daten werden aufbereitet …</p>-->
    <!-- #}-->
    <!-- {# platzhalter bis auction wieder geht #}-->
    <!--{# end platzhalter bis auction wieder geht #}-->
    <div id="image-container">
      <img
        :src="auction_data ? auction_data.permalink : testimageurl"
        :alt="auction_data ? auction_data.article.title : 'Placeholder'"
        >
        <p v-if="auction_data && auction_data.article.active" id="auction-button" class="button">
          <a href="https://auction.francoisenussbaumer.ch/">Bieten</a>
        </p>
    </div>

    <p v-if="auction_data"><strong>{{ auction_data.article.title }}</strong><br>{{ auction_data.article.description }}.</p>
  </main>

</template>

<script>
export default {
  name: "MainTeaser",
  props: {
    testimageurl: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      url: "https://auction.francoisenussbaumer.ch/json",
      auction_data: null
    }
  },
  methods: {
    getAuctionData: async function() { 
      let response = await fetch(this.url);
      this.auction_data = await response.json();
      // console.log(this.auction_data);
    }
  },
  created() {
      this.getAuctionData(); 
  }
}
</script>
