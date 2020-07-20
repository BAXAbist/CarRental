package com.voak.android.rentnewcar

import androidx.fragment.app.Fragment
import android.os.Bundle
import com.google.android.material.bottomnavigation.BottomNavigationView
import androidx.appcompat.app.AppCompatActivity
import com.voak.android.rentnewcar.view.*


class BottomNavigationActivity : AppCompatActivity(), ProfileFragmentViewImpl.NavigationCallback,
    EditInfoFragmentViewImpl.NavigationCallback, EditPasswordFragmentViewIml.NavigationCallback {

    private lateinit var curFragment: Fragment

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_bottom_navigation)
        val navView: BottomNavigationView = findViewById(R.id.nav_view)

        navView.setOnNavigationItemSelectedListener { item ->
            when (item.itemId) {
                R.id.navigation_cars -> {
                    curFragment = CarsFragmentViewImpl.newInstance()
                    openFragment(curFragment)
                    true
                }
                R.id.navigation_history -> {
                    curFragment = HistoryFragmentViewImpl.newInstance()
                    openFragment(curFragment)
                    true
                }
                R.id.navigation_profile -> {
                    val fragment = ProfileFragmentViewImpl.newInstance()
                    fragment.setNavigationCallback(this)
                    curFragment = fragment
                    openFragment(curFragment)
                    true
                }
                else -> false
            }
        }
        navView.selectedItemId = R.id.navigation_cars
    }

    private fun openFragment(fragment: Fragment) {
        supportFragmentManager.beginTransaction()
            .replace(R.id.nav_host_fragment, fragment)
            .commit()
    }

    override fun onBackPressed() {
        when(curFragment) {
             is EditInfoFragmentViewImpl -> {
                 navigateToProfileFragment()
            }
            is EditPasswordFragmentViewIml -> {
                navigateToProfileFragment()
            }
            else -> super.onBackPressed()
        }
    }

    override fun navigateToEditPasswordFragment() {
        val fragment = EditPasswordFragmentViewIml()
        fragment.setNavigationCallback(this)
        curFragment = fragment
        supportFragmentManager.beginTransaction()
            .replace(R.id.nav_host_fragment, curFragment)
            .commit()
    }

    override fun navigateToEditInfoFragment(
        login: String,
        firstName: String,
        secondName: String,
        middleName: String,
        address: String,
        phone: String
    ) {

        val fragment = EditInfoFragmentViewImpl.newInstance(
            login,
            firstName,
            secondName,
            middleName,
            phone,
            address
        )
        fragment.setNavigationCallback(this)
        curFragment = fragment

        supportFragmentManager.beginTransaction()
            .replace(R.id.nav_host_fragment, curFragment)
            .commit()
    }

    override fun navigateToProfileFragment() {
        val fragment = ProfileFragmentViewImpl.newInstance()
        fragment.setNavigationCallback(this)
        curFragment = fragment
        openFragment(curFragment)
    }
}