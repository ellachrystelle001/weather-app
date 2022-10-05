<template>
  <div class="column is-two-thirds">
    <img class="displayLocation" :src=src :alt=alt> 
    <div class="select" @change="changeLocation($event); updateLocationValue();">
      <select v-model="locationValue">
          <option v-for="location in locationList" v-bind:key="location.id" v-bind:value="location.name">{{ location.name }}</option>
      </select>
    </div>
    <h3 class="first-txt has-text-weight-bold is-family-sans-serif">
      {{ locationValue }}, Japan
    </h3>
    <h1 class="second-txt is-size-1 has-text-weight-bold is-family-sans-serif">
      {{ weatherDetails.main ? parseInt(weatherDetails.main.temp - 273.15) : "" }} °C
    </h1>
    <h5 class="third-txt has-text-weight-bold">
        Feels like {{ weatherDetails.main ? parseInt(weatherDetails.main.feels_like - 273.15) : "" }} °C
    </h5>
  </div>
</template>

<script>
  export default {
    data() {
      return { 
        locationValue: "Tokyo"
      }
    },
    props: {
      src: String,
      alt: String,
      locationList: Array,
      weatherDetails: Object,
      changeLocation: Function
    },
    methods: {
      updateLocationValue() {
        this.$emit("updateLocationValue", this.locationValue)
      }
    }
  };
</script>
