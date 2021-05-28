<template>
    <div class="content">
        <div class="desc">{{ propsDescription }}</div>
        <div class="author">{{ propsAuthor }}</div>
    </div>
</template>

<script>
export default {
        props: ['propsAuthor', 'propsDescription']
    }
</script>

<style scoped lang="scss">
    .content {
        margin-top: 30px;

        .author {
            margin-top: 20px;
            text-align: right;
            font-weight: bold;
        }
    }
</style>