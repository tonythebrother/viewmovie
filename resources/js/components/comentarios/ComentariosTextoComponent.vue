<template>
   <div>
        <div class='message bg-dark'>
            <div class='text'>
                {{comment.texto}}
            </div>
            <div class="time">
                {{comment.created_at}}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["comment"]
}
</script>