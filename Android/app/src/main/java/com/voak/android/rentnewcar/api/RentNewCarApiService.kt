package com.voak.android.rentnewcar.api

import com.voak.android.rentnewcar.model.UserData
import retrofit2.Response
import retrofit2.http.*

interface RentNewCarApiService {
    @FormUrlEncoded
    @POST("makeAuth.php")
    suspend fun login(
        @Field("login") login: String,
        @Field("password") password: String
    ): Response<UserData>

    @GET("getUser.php")
    suspend fun getUser(@Query("login") login: String): Response<UserData>

}