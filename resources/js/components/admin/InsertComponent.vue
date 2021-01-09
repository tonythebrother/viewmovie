<template>
  <div class="card bg-secondary">
    <div class="card-header bg-dark">
      <h2 class="text-secondary">Agregar Trailer</h2>
    </div>
    <div class="card-body text-dark">
      <form
        method="post"
        accept-charset="UTF-8"
        v-on:submit.prevent="newTrailer()"
        enctype="multipart/form-data"
      >
        <div class="form-group">
          <label for="name">Pelicula:</label>
          <input name="name" class="form-control" v-model="nombre" />
        </div>
        <div class="form-group">
          <label for="director">Director:</label>
          <input name="director" class="form-control" v-model="director" />
        </div>
        <div class="form-group">
          <label for="musica">Musica:</label>
          <input name="musica" class="form-control" v-model="musica" />
        </div>
        <div class="form-group">
          <label for="protagonistas">Protagonistas:</label>
          <input
            name="protagonistas"
            class="form-control"
            v-model="protagonistas"
          />
        </div>
        <div class="form-group">
          <label for="genero">Genero:</label>
          <input name="genero" class="form-control" v-model="genero" />
        </div>
        <div class="form-group">
          <label for="sinopsis">Sinopsis:</label>
          <textarea
            name="sinopsis"
            rows="4"
            class="form-control"
            v-model="sinopsis"
          ></textarea>
        </div>
        <div class="form-group">
          <label for="estreno"> Estreno:</label>
          <input
            type="date"
            name="estreno"
            class="form-control date"
            v-model="estreno"
          />
        </div>
        <div class="form-group">
          <label for="file_image">Portada:</label>
          <input
            type="file"
            name="file_image"
            @change="obtenerImagen"
            class="form-control-file"
          />
        </div>
        <div class="form-group">
          <label for="file_video">Trailer:</label>
          <input
            type="file"
            name="file_video"
            @change="obtenerVideo"
            class="form-control-file"
          />
        </div>
         <button type="submit" class="btn btn-success btn-block">
            Agregar
          </button>

      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      id: "",
      nombre: "",
      imagen: "",
      video: "",
      sinopsis: "",
      estreno: "",
      director: "",
      musica: "",
      protagonistas: "",
      genero: "",
    };
  },
  methods: {
    newTrailer() {
      if (
        this.nombre.length == 0 ||
        this.sinopsis.length == 0 ||
        this.estreno.length == 0 ||
        this.director.length == 0 ||
        this.musica.length == 0 ||
        this.protagonistas.length == 0 ||
        this.genero.length == 0
      ) {
        alert("No puede dejar los campos vacios.");
      } else {
        let form_trailer = new FormData();
        form_trailer.append("nombre", this.nombre);
        form_trailer.append("sinopsis", this.sinopsis);
        form_trailer.append("estreno", this.estreno);
        form_trailer.append("director", this.director);
        form_trailer.append("musica", this.musica);
        form_trailer.append("protagonistas", this.protagonistas);
        form_trailer.append("genero", this.genero);
        form_trailer.append("imagen", this.imagen);
        form_trailer.append("video", this.video);

        axios.post("/trailers", form_trailer).then((response) => {

          alert("Se a agregado exitosamente.");

          window.location.reload();

          this.nombre = "";
          this.sinopsis = "";
          this.estreno = "";
          this.director = "";
          this.musica = "";
          this.protagonistas = "";
          this.genero = "";

        });
      }
    },
    obtenerImagen(e) {
      this.imagen = e.target.files[0];
    },
    obtenerVideo(e) {
      this.video = e.target.files[0];
    },
  },
};
</script>
