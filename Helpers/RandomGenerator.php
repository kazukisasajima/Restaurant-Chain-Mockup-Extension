<?php

namespace Helpers;

use Faker\Factory;
use Models\Companies\Restaurants\RestaurantChain;
use Models\Companies\Restaurants\RestaurantLocation;
use Models\Users\Employees\Employee;
use Models\Users\User;

class RandomGenerator{
    public static function employee(): Employee{
        $faker = Factory::create();

        return new Employee(
            $faker->randomNumber(),
            $faker->firstName(),
            $faker->lastName(),
            $faker->email,
            $faker->password,
            $faker->phoneNumber,
            $faker->address,
            $faker->dateTimeThisCentury,
            $faker->dateTimeBetween('-10 years','+20 years'),
            $faker->randomElement(['admin','user','editor']),
            $faker->randomElement(['Chef','Cashier','Server','Cooking Assitance']),
            $faker->randomFloat(),
            $faker->dateTimeBetween('-10 years','now'),
            array($faker->randomElement(['Great!!','Good!','Not bad','Same...']))
        );
    }

    public static function employees(int $min,int $max):array{
        $faker = Factory::create();
        $employees = [];
        $numberOfEmployees = $faker->numberBetween($min,$max);

        for($i = 0;$i < $numberOfEmployees;$i++){
            $employees[] = self::employee();
        }
        return $employees;
    }

    public static function generateEmployees(int $count, float $salary_min, float $salary_max, int $locations, int $zipcode_min, int $zipcode_max): array {
        $faker = Factory::create();
        $employees = [];
        
        for ($i = 0; $i < $count; $i++) {
            $employees[] = new Employee(
                $faker->randomNumber(),
                $faker->firstName(),
                $faker->lastName(),
                $faker->email,
                $faker->password,
                $faker->phoneNumber,
                $faker->address,
                $faker->dateTimeThisCentury,
                $faker->dateTimeBetween('-10 years', '+20 years'),
                $faker->randomElement(['admin', 'user', 'editor']),
                $faker->jobTitle(),
                $faker->randomFloat(2, $salary_min, $salary_max),
                $faker->dateTimeBetween('-10 years', 'now'),
                [$faker->randomElement(['Great!!', 'Good!', 'Not bad', 'Same...'])]
            );
        }
        return $employees;
    }
    

    public static function user(): User {
        $faker = Factory::create();

        return new User(
            $faker->randomNumber(),
            $faker->firstName(),
            $faker->lastName(),
            $faker->email,
            $faker->password,
            $faker->phoneNumber,
            $faker->address,
            $faker->dateTimeThisCentury,
            $faker->dateTimeBetween('-10 years','+10 years'),
            $faker->randomElement(['admin', 'user', 'editor'])
        );
    }

    public static function users(int $min, int $max): array {
        $faker = Factory::create();
        $users = [];
        $numberOfUsers = $faker->numberBetween($min, $max);

        for ($i = 0; $i < $numberOfUsers; $i++) {
            $users[] = self::user();
        }
        return $users;
    }


    public static function restauratLocation(): RestaurantLocation{
        $faker = Factory::create();

        return new RestaurantLocation(
            $faker->streetAddress(),
            $faker->address(),
            $faker->city(),
            $faker->state(),
            $faker->postcode(),
            self::employees(2,5),
            $faker->boolean(),
            $faker->boolean()
        );
    }

    public static function restauratLocations(int $min,int $max):array{
        $faker = Factory::create();
        $restaurantLocations = [];
        $numberOfRestaurantLocations = $faker->numberBetween($min,$max);

        for($i = 0;$i < $numberOfRestaurantLocations;$i++){
            $restaurantLocations[] = self::restauratLocation();
        }
        return $restaurantLocations;
    }

    public static function restaurantChain():RestaurantChain{
        $faker = Factory::create();

        return new RestaurantChain(
            $faker->company(),
            $faker->year(),
            $faker->text(100),
            $faker->url(),
            $faker->phoneNumber(),
            $faker->randomElement(['Restaurant','Hotl','IT','Bank']),
            $faker->name(),
            $faker->boolean(),
            $faker->country(),
            $faker->name(),
            $faker->randomNumber(),
            $faker->randomNumber(),
            self::restauratLocations(1,3),
            $faker->randomElement(['Japanese','French','Chainese','Brazilian','Indian']),
            $faker->randomNumber(),
            $faker->company()
        );
    }

    public static function restaurantChains(int $min,int $max):array{
        $faker = Factory::create();
        $restaurantChains = [];
        $numberOfRestaurantChains = $faker->numberBetween($min,$max);

        for($i = 0;$i < $numberOfRestaurantChains; $i++){
            $restaurantChains[] = self::restaurantChain();
        }
        return $restaurantChains;
    }

}

?>
