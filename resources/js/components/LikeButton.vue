<template>
    <div>
        <span class="like-btn"
            :class="{'like-active' : isActive}"
            @click="likeRecipe"
        ></span>

        <p>A {{ totalLikes }} usuarios les gusta esta receta.</p>
    </div>
</template>
<script>
export default {
    props: ['recipeId', 'like', 'likes'],
    data: function () {
        return {
            isActive: this.like,
            totalLikes: this.likes
        }
    },
    methods: {
        likeRecipe() {
            axios.post('/recipes/' + this.recipeId)
                .then(response => {
                    if (response.data.attached.length > 0) {
                        this.$data.totalLikes++;
                    } else {
                        this.$data.totalLikes--;
                    }

                    this.isActive = !this.isActive;

                    console.log(response);
                }).catch(error => {
                    if (error.response.status === 401) {
                        window.location = '/register';
                    }
                })
        }
    }
}
</script>
