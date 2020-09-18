<template>
  <div class="content_main">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card bg-dark text-dark">
          <div class="card-body">
            <seetrailers-component
              v-for="trailer in trailers"
              :key="trailer.id"
              :trailer="trailer">
            </seetrailers-component>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props:['user'],
  data() {
    return {
      
      trailers: []
    };
  },
  mounted() {
    axios.get("/trailers").then(response => {
      this.trailers = response.data;
    });
  }
};
</script>