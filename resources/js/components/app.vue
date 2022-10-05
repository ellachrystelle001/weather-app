<template>
  <div class="columns">
    <Display 
      :src=src
      :alt=alt
      :locationList=locationList
      :weatherDetails=weatherDetails
      :changeLocation="changeLocation"
      @updateLocationValue="updateLocationValue($event)"
    />
    <Details
      :locationValue=locationValue
      :currentDay=currentDay
      :currentTime=currentTime
      :weatherDetails=weatherDetails
      :locationDetails=locationDetails
    />
  </div>  
</template>

<script>
  import displaySection from "./displaySection.vue";
  import detailsSection from "./detailsSection.vue";
  import constants from "../constants.js";

  export default {
    name: "app",
    data() {
      return { 
        locationValue: "Tokyo",
        currentDay: "",
        currentTime: "",
				locationList: [],
        weatherDetails: [],
        locationDetails: [],
        src: "https://mediaim.expedia.com/localexpert/760795/68bf4b12-3186-4aac-976f-814f1f365106.jpg?impolicy=resizecrop&rw=1005&rh=565",
        alt: "Tokyo"
      };
    },
    components: {
      displaySection,
      detailsSection
    },
    methods: {
      getWeatherDetails() {
        let sLocation =  event?.target.value || "Tokyo";

        axios.get(constants.APP_URL + "/api/weather/" + sLocation)
          .then(response => {
            this.weatherDetails = response.data.body.list[0];
          })
          .catch(error => {
            console.log(error);
          });
      },
      getLocationDetails() {
        let sLocation =  event?.target.value || "Tokyo";

        axios.get(constants.APP_URL + "/api/places/search/" + sLocation)
          .then(response => {
              this.locationDetails = response.data.body.results[0];
          })
          .catch(error => {
            console.log(error);
          });
      },
      updateLocationValue(sLocation) {
        this.locationValue = sLocation;
      },
      changeDisplayImage(sLocation) {
         const IMAGE_LIST = {
          Tokyo: "https://mediaim.expedia.com/localexpert/760795/68bf4b12-3186-4aac-976f-814f1f365106.jpg?impolicy=resizecrop&rw=1005&rh=565",
          Yokohoma: "https://digitalnomads.world/wp-content/uploads/2021/11/yokohama-digital-nomads.jpg",
          Kyoto: "https://www.travelcaffeine.com/wp-content/uploads/2020/03/hirano-shrine-cherry-blossom-hanami-sakura-season-kyoto-japan-sunburst-torii.jpg",
          Osaka: "https://rimage.gnst.jp/livejapan.com/public/article/detail/a/20/00/a2000008/img/en/a2000008_main.jpg?20200911191757&q=80&rw=750&rh=536",
          Sapporo: "https://cdn.thecrazytourist.com/wp-content/uploads/2018/06/ccimage-shutterstock_724162873.jpg",
          Nagoya: "https://www.planetware.com/photos-large/JPN/japan-nagoya-castle.jpg"
        };
          
        this.src = IMAGE_LIST[sLocation];
        this.alt = sLocation;
      }, 
      changeLocation(event) {
        this.changeDisplayImage(event.target.value);
        this.getWeatherDetails();
        this.getLocationDetails();
      }
    },
    beforeMount() {
      let oCurrentDate = new Date();
      const LOCATION_LIST = [
        "Tokyo",
        "Yokohoma",
        "Kyoto",
        "Osaka",
        "Sapporo",
        "Nagoya"
      ];

      this.getWeatherDetails();
      this.getLocationDetails();

      this.currentDay = oCurrentDate.toLocaleString("en-US", {
        timeZone: "Asia/Tokyo",
        weekday: "short"
      });

      this.currentTime = oCurrentDate.toLocaleString("en-US", {
        timeZone: "Asia/Tokyo",
        hour: "numeric",
        minute: "numeric"
      });

      for (let i = 0; i < LOCATION_LIST.length; i++) {
        this.locationList.push({"id": i = 1, "name": LOCATION_LIST[i]});
      };
		}
  };
</script>
