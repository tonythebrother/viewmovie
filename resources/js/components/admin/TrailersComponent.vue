<template>
  <div class="card bg-secondary text-dark">
  
    <a v-on:click="seeTrailer()" v-if="editMode & videoMode">
        <img :src="mostrarImagen" class="card-img-top" alt="Imagen no disponible"  />
      </a>
      <a :name="name">
       <video v-if="!videoMode" controls="controls" :poster="mostrarImagen">
          <source :src="mostrarVideo" type="video/mp4" />
          Your browser does not support the video tag.
        </video>
      </a>
    <div class="card-header bg-dark text-secondary text-center">
       <h2 class="text-light">{{trailer.nombre}}</h2>
    </div>

    <div class="card-body text-center" v-if="editMode">

    <strong>Sinopsis:</strong>
      <p>
        <br>
        {{trailer.sinopsis}}
      </p>

      <br />

    <strong>Fecha de Estreno:</strong>
      <p>
        <br>
        {{trailer.estreno}}
      </p>

      <br />

    <strong>Director:</strong>
      <p>
        <br>
        {{trailer.director}}
      </p>

      <br />

      <strong>Música:</strong>
      <p>
        <br>
        {{trailer.musica}}
      </p>

      <br />


    <strong>Protagonistas:</strong>
      <p>
        <br>
        {{trailer.protagonistas}}
      </p>

      <br />

      <strong>Genero:</strong>
      <p>
        <br>
        {{trailer.genero}}
      </p>
    </div>

    <div v-if="!editMode" class="card-body">
      <form
        method="post"
        accept-charset="UTF-8"
        v-on:submit.prevent="onClickUpdate()"
        enctype="multipart/form-data"
      >

      <div class="form-group">
        <label for="file_image">
          Portada:
        </label>
        <input
            type="file"
            @change="obtenerImagen"
            name="file_image"
            class="form-control-file"
          />
        </div>
      <div class="form-group">
        <label for="file_image">
          Trailer
        </label>
        <input
            type="file"
            @change="obtenerVideo"
            name="file_image"
            class="form-control-file"
          />
      </div>
      <div class="form-group">
        <label>Nombre:</label>
        <input type="text" class="form-control" v-model="trailer.nombre" />
      </div>
      <div class="form-group">
         <label>Sinopsis:</label>
         <textarea class="form-control" rows="4" v-model="trailer.sinopsis"></textarea>
      </div>
      <div class="form-group">
         <label>Fecha de Estreno:</label>
         <input type="date" class="form-control" v-model="trailer.estreno " />
      </div>
      <div class="form-group">
        <label>Director:</label>
        <input type="text" class="form-control" v-model="trailer.director" />
      </div>
      <div class="form-group">
        <label>Música:</label>
        <input type="text" class="form-control" v-model="trailer.musica" />
      </div>
      <div class="form-group">
        <label>Protagonistas:</label>
        <input type="text" class="form-control" v-model="trailer.protagonistas" />
      </div>
      <div class="form-group">
        <label>Genero:</label>
        <input type="text" class="form-control" v-model="trailer.genero" />
      </div>
      </form>
    </div>
    <div class="card-footer bg-dark text-secondary">
      <button v-if="!editMode" type="submit" class="btn btn-success btn-block">Agregar</button>
      <button v-if="editMode" class="btn btn-success btn-block" v-on:click="onClickEdit()">Editar</button>

      <button v-if="editMode" class="btn btn-danger btn-block" v-on:click="onClickDelete()">Eliminar</button>
      <button v-else class="btn btn-danger btn-block" v-on:click="onClickCancel()">Cancelar</button>

      <a v-if="videoMode && editMode"  :href="'#'+name" v-on:click="seeTrailer()" class="btn btn-secondary btn-block">Ver Trailer</a>
      <button v-if="!videoMode" class="btn btn-secondary btn-block" v-on:click="onClickCancel()">Ver Portada</button>

      <button v-if="editMode" data-toggle="collapse" data-target="#demo" class="btn btn-secondary btn-block">Ver Comentarios</button>

      <div id="demo" class="collapse">

        

      </div>
      
    </div>
  </div>
</template>

<script>
export default {
  props: ["trailer"],
  data() {
    return {
      editMode: true,
      videoMode: true
    };
  },
  methods: {
    onClickDelete() {
      var opcion = confirm("¿Desea eliminar?");
      if (opcion == true) {
        axios.delete("/trailers/" + this.trailer.id).then(response => {
          alert("Se ha eliminado exitosamente.");
          this.$emit("delete");
        });
      }
    },
    onClickEdit() {
      this.editMode = false;
    },
    onClickCancel() {
      this.editMode = true;
      this.videoMode = true;
    },
    onClickUpdate() {
      let form = new FormData();
      form.append("nombre", this.trailer.nombre);
      form.append("sinopsis", this.trailer.sinopsis);
      form.append("estreno", this.trailer.estreno);
      form.append("director", this.trailer.director);
      form.append("musica", this.trailer.musica);
      form.append("protagonistas", this.trailer.protagonistas);
      form.append("genero", this.trailer.genero);
      form.append("imagen", this.trailer.imagen);
      form.append("video", this.trailer.video);

      axios.delete("/trailers/" + this.trailer.id).then(response => {
        axios.post("/trailers", form).then(responseU => {
          alert("Se a agregado exitosamente.");
          this.editMode = true;
          this.$emit("update", responseU.data);
        });
      });
    },
    obtenerImagen(e) {
      this.trailer.imagen = e.target.files[0];
    },
    obtenerVideo(e) {
      this.trailer.video = e.target.files[0];
    },
    seeTrailer(){
      this.videoMode = false;
    }
  },
  computed: {
    mostrarImagen() {
      let img =
        "http://localhost:8000/" +
        this.trailer.imagen;
      return img;
    },
    mostrarVideo() {
      let vid = "http://localhost:8000/" +
        this.trailer.video;
      return vid;
    },
    name() {
      return this.trailer.nombre;
    }
  }
};
</script>