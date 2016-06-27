# Booking service application 

##The structure of the Model is as follows:


Slot belongs to one customer

Customer hasOne slot

Staff hasMany customer

Customer hasOne staff

Booking hasMany customer

Booking belongs to slot etc.

I have 4 tables with attributes as follows:

staffs: id, name (Assumed that he was already registered to be eligible to work), customers can choose any staff they want.

customers: id, name (Assumed that he was already registered to be eligible for the service), no customer is allowed to book for more than once since it is a weekly service.

slots: id, start_time, end_time (Assumed that we only have duration between 09:00:00 - 18:00:00 with hourly interval for all customers see folder(database/seeder).

bookings: id, start_time, end_time, service, customer_id, staff_id

The App is structured as follows:

1) Appointedd folder containing all the source codes

2) Appointedd/controllers: contains the booking controller that was used to develop the Restful Api of the application

3) Appointedd/database: contains all the migration files and the seeder for the population of the database model for easy creation of the dropdown box

4) Appointedd/model: for defining Eloquent table relationships and validation of the input fields

5) Appointed/seeds: for populating the database

6) Appointedd/views/booking/bookingHome: where the booking form is displayed

7) Appointedd/views/booking/customer_booking: displays the booking infomation (customer-name, start-time, end-time, service, staff) of a customer that have successfully booked for a service

8)Appointedd/views/booking/index: shows the view of all the names of the customers that have booked for a service.

9) Appointedd/routes: The API routes for the application uri and the controllers method
