<template>
<div class="content_main row justify-content-center">
        <div class="card bg-dark col-sm-8">
          <div class="card-body">
            <insert-component @new="addTrailers"></insert-component>
          </div>
          <div class="card-body">
            <trailers-component
              v-for="(trailer, index) in trailers"
              :key="trailer.id"
              :trailer="trailer"
              @update="updateTrailer(index, ...arguments)"
              @delete="deleteTrailer(index)"
            ></trailers-component>
          </div>
        </div>    
  </div>
</template>

<script>
export default {
  data() {
    return {
      trailers: []
    };
  },
  mounted() {
    axios.get("/trailers").then(response => {
      this.trailers = response.data;
    });

    alert(this.user);
  },

  methods: {
    addTrailers(trailer) {
      this.trailers.push(trailer);
    },
    updateTrailer(index, trailer) {
      this.trailers.splice(index, 1);
      this.trailers.push(trailer);
    },
    deleteTrailer(index) {
      this.trailers.splice(index, 1);
    }
  }
};
</script>