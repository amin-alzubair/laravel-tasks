<template>
      <Link :href="'/add-friend?user_id='+user.id" preserve-scroll class="bg-navColor px-1 py-1 text-white rounded-md text-sm" v-show="!user.sentToYou && !user.sentToOthers && !user.isFriendWith  && user.id != $page.props.auth.user.id" method="post"  as="button"><i class="fa fa-plus mr-2"></i>Add Friend</Link>
      <Link :href="'/unfriend-friend?user_id='+user.id" preserve-scroll class="bg-red-500 px-1 py-1 text-white rounded-md  text-sm" v-show="user.sentToOthers" method="post"  as="button"><i class="fa fa-minus mr-2"></i>cancel</Link>
      <Link :href="'/unfriend-friend?user_id='+user.id" preserve-scroll class="bg-red-500 px-1 py-1 text-white rounded-md  text-sm" v-show="user.isFriendWith" method="post"  as="button"><i class="fa fa-close mr-2"></i>Unfriend</Link>
      <Link :href="'/accept-friend?user_id='+user.id" preserve-scroll class="bg-navColor px-1 py-1 text-white rounded-md  text-sm" v-show="user.sentToYou" method="post"  as="button"><i class="fa fa-plus mr-2"></i>Accept</Link>
      <Link :href="'/deny-friend?user_id='+user.id" preserve-scroll class="bg-red-500 px-1 py-1 text-white rounded-md  text-sm" v-show="user.sentToYou" method="post"  as="button"><i class="fa fa-trash mr-2"></i>Remove</Link>
      <a :href="`/messenger/${user.id}`" class="p-2 text-indigo-700  bg-violet-200" v-show="user.isFriendWith"><i  class="fa fa-message mx-2"></i>messanger</a>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
export default {

    props:{user:Object},
    components:{ Link }

}
</script>

<style>

</style>