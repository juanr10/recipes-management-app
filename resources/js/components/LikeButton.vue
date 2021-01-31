<template>
    <div>
        <span class="like-btn"
            :class="{'like-active' : this.like}"
            @click="likeRecipe"
        ></span>

        <p>A {{ likesQuantity }} usuarios les gusta esta receta.</p>
    </div>
</template>
<script>
export default {
    props: ['recipeId', 'like', 'likes'],
    data: function () {
        return {
            totalLikes: this.likes
        }
    },
    methods: {
        likeRecipe() {
            axios.post('/recipes/' + this.recipeId)
                .then(response => {
                    if(response.data.attached.length > 0){
                        this.$data.totalLikes++;
                    } else {
                        this.$data.totalLikes--;
                    }

                    console.log(response);
                }).catch(error => {
                    console.log(error);
                })
        }
    },
    computed: {
        likesQuantity: function() {
            return this.totalLikes;
        }
    }
}
</script>
