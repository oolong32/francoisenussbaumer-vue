<template>

      <figure>
        <h2>{{ painting.title }}</h2>

        <figcaption>
          <span class="pic-price">{{ displayPrice }}</span>
          <span class="pic-specs">{{ displayPicSpecs }}</span>
        </figcaption>

        <img :src="url" :alt="painting.title"> 
      </figure>

</template>

<script>
export default {
  name: "Bild",
  props: {
    painting: {
      type: Object,
      required: true
    }
  },
  computed: {
    url() {
      return `/${this.painting.url}`
    },
    displayPrice() {
      if (this.painting.sold) {
        return 'Verkauft'
      } else if (this.painting.price) {
        return `Preis: ${this.painting.price}.—`
      } else {
        return '<!-- price not set -->'
      }
    },
    displayPicSpecs() {
      return `${this.painting.technique}, ${this.painting.width} × ${this.painting.height} cm`
    }
  }
}
</script>
