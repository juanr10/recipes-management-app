<template>
     <input type="submit" class="dropdown-item"  value="Eliminar"
     @click="deleteRecipe">
</template>

<script>
export default {
    props: ['recipeId'],
    methods: {
        deleteRecipe(){
            this.$swal({
            title: '¿Desea eliminar esta receta?',
            text: "La información será eliminada permanentemente.",
            icon: 'warning',
            reverseButtons: true,
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar'
            }).then((result) => {
                if (result.isConfirmed) {
                    const params = {
                        id: this.recipeId
                    }

                    axios.post(`/recipes/${this.recipeId}`, {params, _method: 'delete'})
                    .then(response => {
                        // console.log(response);
                        this.$swal({
                        title: 'Receta eliminada',
                        text: "Se ha eliminado la receta con éxito.",
                        icon: 'success',
                        });

                        //Refreshing DOM
                        this.$el.parentNode.parentNode.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode.parentNode.parentNode);
                    }).catch(error => {
                        // console.log(error);
                        this.$swal({
                        title: 'Receta no eliminada',
                        text: "Debido a un error no se ha podido eliminar la receta, vuelva a intentarlo más tarde.",
                        icon: 'error',
                        });
                    });
                }
            });
        }
    }
}
</script>
