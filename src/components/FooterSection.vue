<template>

  <footer>

    <section id="instagram">
      <p>{{ contact.instagramText }}</p>
      
      <a class="contact-instagram-link" :href="contact.instagramLink" target="_blank">
        <svg width="30px" height="30px" viewBox="0 0 30 30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <g id="instagram-logo">
              <path d="M21.6010588,0 L8.23305882,0 C3.69335294,0 0,3.69352941 0,8.23323529 L0,21.6012353 C0,26.1411176 3.69335294,29.8344706 8.23305882,29.8344706 L21.6010588,29.8344706 C26.1411176,29.8344706 29.8344706,26.1409412 29.8344706,21.6012353 L29.8344706,8.23323529 C29.8344706,3.69352941 26.1411176,0 21.6010588,0 Z M27.1875882,21.6012353 C27.1875882,24.6815294 24.6815294,27.1874118 21.6012353,27.1874118 L8.23305882,27.1874118 C5.15294118,27.1874118 2.64705882,24.6815294 2.64705882,21.6012353 L2.64705882,8.23323529 C2.64705882,5.15311765 5.15294118,2.64705882 8.23305882,2.64705882 L21.6010588,2.64705882 C24.6813529,2.64705882 27.1875882,5.15311765 27.1875882,8.23323529 L27.1875882,21.6012353 L27.1875882,21.6012353 Z" id="Umriss"></path>
              <path d="M14.9172353,7.23 C10.6782353,7.23 7.22964706,10.6785882 7.22964706,14.9175882 C7.22964706,19.1564118 10.6782353,22.6048235 14.9172353,22.6048235 C19.1562353,22.6048235 22.6048235,19.1564118 22.6048235,14.9175882 C22.6048235,10.6785882 19.1562353,7.23 14.9172353,7.23 Z M14.9172353,19.9575882 C12.138,19.9575882 9.87670588,17.6966471 9.87670588,14.9174118 C9.87670588,12.138 12.1378235,9.87688235 14.9172353,9.87688235 C17.6966471,9.87688235 19.9577647,12.138 19.9577647,14.9174118 C19.9577647,17.6966471 17.6964706,19.9575882 14.9172353,19.9575882 Z" id="Objektiv"></path>
              <path d="M22.9272353,4.98547059 C22.4172353,4.98547059 21.9162353,5.19194118 21.5560588,5.55370588 C21.1941176,5.91370588 20.9860588,6.41488235 20.9860588,6.92664706 C20.9860588,7.43682353 21.1942941,7.93782353 21.5560588,8.29958824 C21.9160588,8.65958824 22.4172353,8.86782353 22.9272353,8.86782353 C23.439,8.86782353 23.9384118,8.65958824 24.3001765,8.29958824 C24.6619412,7.93782353 24.8684118,7.43664706 24.8684118,6.92664706 C24.8684118,6.41488235 24.6619412,5.91370588 24.3001765,5.55370588 C23.9401765,5.19194118 23.439,4.98547059 22.9272353,4.98547059 Z" id="Sucher"></path>
          </g>
        </svg>
      </a>
    </section>

    <section id="newsletter">
      <p>{{ contact.newsletterSignupText }}</p>
      <a class="newsletter-signup" :href="contact.signupLink" target="_blank"><p>Newsletter</p></a>
    </section>

    <section id="contact">
      <p>
        <a class="contact-email" :href="`mailto:${ contact.email }`">{{ contact.email }}</a><br>
        <a class="contact-telefon" :href="`tel:${ contact.telefon }`">{{ contact.telefon }}</a><br>
        <a class="contact-location" :href="`https://www.google.com/maps/place/${ latitude },${ longitude }`" target="_blank">{{ contact.latitudeDegrees }}° {{ contact.latitudeMinutes }}' {{ contact.latitudeSeconds }}" <span class="smallcaps">N</span> {{ contact.longitudeDegrees }}° {{ contact.longitudeMinutes }}' {{ contact.longitudeSeconds }}" <span class="smallcaps">E</span></a>
      </p>
    </section>

    <section id="credits">
      <p class="credits">Design & Programming: <a href="https://josefrenner.ch">Josef Renner</a>, 2019/21</p>
    </section>


  </footer>
</template>

<script>
export default {
  name: "FooterSection",
  props: {
    contact: {
      type: Object,
      required: true
    }
  },
  computed: {
    latitude() {
     return this.contact.latitudeDegrees + this.contact.latitudeMinutes / 60 + this.contact.latitudeSeconds / 3600 
    },
    longitude() {
      return this.contact.longitudeDegrees + this.contact.longitudeMinutes / 60 + this.contact.longitudeSeconds / 3600 
    }
  }
}
</script>
