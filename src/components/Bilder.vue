<template>
  <main id="bilder">

      <section v-if="categories" id="filter">
       <h3 id="filter-title" @click="toggleFilters">Auswahl</h3>
        <ul id="filter-list" v-if="filterVisible">

          <li v-for="category in categories">
            <a
              href="category.url"
              @click.stop.prevent="filterClicked(category.slug)"
              :class="category.title"
              :style="categoryActive(category.slug) ? '' : 'text-decoration: line-through;'"
            >{{ category.title }}</a></li>
        </ul>
      </section>

      <section v-if="paintings" id="bilder-raster">

        <figure 
          v-for="painting in paintings"
          :key="painting.id"
          v-show="allVisible || categoryVisible(painting.categories)"
          class="painting"
          :class="printCategories(painting.categories)"
          >
          <a :href="`/painting/${ painting.id }/`">
            <img :src="`/${ painting.thumb }`" :alt="painting.title">
          </a>
          <caption v-if="painting.sold" class="sold"></caption>
        </figure>

      </section>

      <p v-else style="grid-column: 1/-1; text-align: center;">Im Moment gibt es noch keine Bilder.</p>

  </main>

</template>

<script>
export default {
  name: "Bilder",
  props: {
    paintings: {
      type: Array,
      required: true
    },
    categories: {
      type: Array,
      required: true
    }
  },
  data() {
    return {
      filterVisible: false,
      activeFilters: []
    }
  },
  computed: {
    allVisible() {
      if (this.activeFilters.length === 0) {
        return true
      } else {
        return false
      }
    },
  },
  methods: {
    toggleFilters() {
      this.filterVisible = !this.filterVisible
    },
    filterClicked(name) {
      console.log(`${name} clicked`)
      if (this.activeFilters.includes(name)) {
      console.log(`${name} included, splicing now`)
        this.activeFilters.splice(this.activeFilters.indexOf(name), 1)
      } else {
        this.activeFilters.push(name)
      }
    },
    printCategories(categories) {
      if (categories.length) {
        const categoryTitles = categories.map(category => category.slug).join(' ')
        return categoryTitles
      } else {
        return 'no-cateogry'
      }
    },
    categoryActive(name) {
      if (this.activeFilters.length) {
        return this.activeFilters.includes(name)
      } else {
        // no selection
        return true
      }
    },
    categoryVisible(categories) {
      // gets array of categories
      // can be empty, or have one or more entries
      let visible = false
      if (categories.length) {
        categories.forEach(category => {
          if (this.activeFilters.includes(category.slug)) {
            visible = true
          }
        })
      } else {
        // img has no category, always visible
        visible = true
      }
      return visible
    }
  }
}
</script>
