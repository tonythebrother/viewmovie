<template>
    <div class="chat">
        <form
          method="post"
          accept-charset="UTF-8"
          v-on:submit.prevent="newComment()">

                <div class="chat-body rounded-left" id="Chat">
                    <texto-component v-for="comment in comments" :key="comment.id"
                    :comment="comment">
                    </texto-component>
                </div>
                <div class="chat-input">
                    <input class="form-control" id="message" placeholder="Escribe un comentario" v-model="texto" autocomplete="off">
                    <input type="submit" class="btn btn-light" id="send" value="">
                </div>
        </form>
    </div>
</template>

<script>
export default {
    props: ['user'],
    data() {
        return {
        comments: [],
        texto:"",
        usuario: this.user
        };
    },
    mounted() {

        axios.get("/comments").then(response => {
             this.comments = response.data;
        });

    },
    methods:{
        newComment() {

            if(this.texto !== ""){

                let form_comment = {


                    texto: this.texto
                    
                };

                axios.post("/comments", form_comment).then(response => {
                this.$emit("new", response.data);
                    alert("Se a agregado exitosamente.");
                     this.comments.push(response.data);
                });

                this.texto = "";

            }
        }
    }
}
</script>