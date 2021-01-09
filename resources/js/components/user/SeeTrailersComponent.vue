<template>
  <div>
    <a v-on:click="seeTrailer()" v-if="editMode & videoMode">
      <img
        :src="mostrarImagen"
        class="card-img-top"
        alt="Imagen no disponible"
      />
    </a>
    <a :name="name">
      <video v-if="!videoMode" controls="controls" :poster="mostrarImagen">
        <source :src="mostrarVideo" type="video/mp4" autoplay />

        Your browser does not support the video tag.
      </video>
    </a>

    <div class="card-header bg-dark text-secondary text-center">
      <h2 class="text-light">{{ trailer.nombre }}</h2>
    </div>

    <div class="card-body bg-secondary text-center" v-if="editMode">
      <strong>Sinopsis:</strong>
      <p>
        <br />
        {{ trailer.sinopsis }}
      </p>

      <br />

      <strong>Fecha de Estreno:</strong>
      <p>
        <br />
        {{ trailer.estreno }}
      </p>

      <br />

      <strong>Director:</strong>
      <p>
        <br />
        {{ trailer.director }}
      </p>

      <br />

      <strong>Música:</strong>
      <p>
        <br />
        {{ trailer.musica }}
      </p>

      <br />

      <strong>Protagonistas:</strong>
      <p>
        <br />
        {{ trailer.protagonistas }}
      </p>

      <br />

      <strong>Genero:</strong>
      <p>
        <br />
        {{ trailer.genero }}
      </p>

      <button
        v-if="videoMode"
        v-on:click="seeTrailer()"
        class="btn btn-secondary btn-block"
      >
        Ver Trailer
      </button>
      <button
        v-else
        class="btn btn-secondary btn-block"
        v-on:click="onClickCancel()"
      >
        Ver Portada
      </button>
    </div>
  </div>
</template>

<script>
export default {
  props: ["trailer"],
  data() {
    return {
      editMode: true,
      videoMode: true,
    };
  },
  methods: {
    onClickEdit() {
      this.editMode = false;
    },
    onClickCancel() {
      this.editMode = true;
      this.videoMode = true;
    },
    seeTrailer() {
      this.videoMode = false;
    },
  },
  computed: {
    mostrarImagen() {
      let img = `/${this.trailer.imagen}`;
      return img;
    },
    mostrarVideo() {
      let vid = `/${this.trailer.video}`;
      return vid;
    }
  },
};
</script>
