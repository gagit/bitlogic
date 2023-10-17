<script>

export default {
    name: 'App',
    data: () => ({
        counter:0,
    })
}
</script>

<template>
  <div>
      <H2>welcome </H2>
      <button @click="counter++"> You're clicked {{ counter }} time/s! </button>
  </div>
</template>

<style >

</style>