<?php

namespace App\Domain\Models;

use App\Helpers\Core\PDOService;
use App\Helpers\FlashMessage;

class UserModel extends BaseModel
{

    private $users_table = "users";

    public function __construct(PDOService $db_service)
    {
        return parent::__construct($db_service);
    }

    public function getUsers(): mixed
    {
        $sql = "SELECT * FROM {$this->users_table} ";
        $users = $this->selectALl($sql);
        return $users;
    }

    public function getUserById(int $user_id): mixed
    {
        $sql = "SELECT * FROM {$this->users_table} WHERE id = :id";
        $user = $this->selectOne($sql, ['id' => $user_id]);
        return $user;
    }

    /**
     * Create a new user account.
     *
     * @param array $data User data (first_name, last_name, username, email, password, role)
     * @return int The ID of the newly created user
     */
    public function createUser(array $data): string
    {
        $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);

        $sql = "INSERT INTO {$this->users_table} (first_name, last_name, username, email, password_hash, role) VALUES (:first_name, :last_name, :username, :email, :password, :role)";
        $this->execute($sql, [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => $hashedPassword,
            'role' => $data['role']
        ]);
        return $this->lastInsertId();
    }

    /**
     * Find a user by email address.
     *
     * @param string $email The email address to search for
     * @return array|null User data array or null if not found
     */
    public function findByEmail(string $email): mixed
    {
        $sql = "SELECT * FROM {$this->users_table} WHERE email = :email LIMIT 1";
        $user = $this->selectOne($sql, [
            'email' => $email
        ]);
        return $user;
    }

    /**
     * Find a user by username.
     *
     * @param string $username The username to search for
     * @return array|null User data array or null if not found
     */
    public function findByUsername(string $username): mixed
    {
        $sql = "SELECT * FROM {$this->users_table} WHERE username = :username LIMIT 1";
        $user = $this->selectOne($sql, [
            'username' => $username
        ]);
        return $user;
    }

    /**
     * Check if an email address already exists in the database.
     *
     * @param string $email The email address to check
     * @return bool True if email exists, false otherwise
     */
    public function emailExists(string $email): bool
    {
        $sql = "SELECT COUNT(*) FROM {$this->users_table} WHERE email = :email";
        $count = $this->count($sql, [
            'email' => $email
        ]);
        return $count > 0;
    }


    /**
     * Check if a username already exists in the database.
     *
     * @param string $username The username to check
     * @return bool True if username exists, false otherwise
     */
    public function usernameExists(string $username): bool
    {
        $sql = "SELECT COUNT(*) FROM {$this->users_table} WHERE username = :username";
        $count = $this->count($sql, [
            'username' => $username
        ]);
        return $count > 0;
    }

    /**
     * Verify user credentials by email/username and password.
     *
     * @param string $identifier Email or username
     * @param string $password Plain-text password to verify
     * @return array|null User data if credentials are valid, null otherwise
     */
    public function verifyCredentials(string $identifier, string $password): ?array
    {
        $user = $this->findByEmail($identifier);
        if (!$user) {
            $user = $this->findByUsername($identifier);
        }
        if (!$user) {
            return null;
        }

        if (password_verify($password, $user['password_hash'])) {
            return $user;
        } else {
            FlashMessage::error("password Incorrect");
        }
        return null;
    }

    public function updateUser(int $userId, array $userInfo): int
    {

        $sql = "UPDATE{$this->users_table} SET first_name = :first_name, last_name = :last_name, username = :username, email = :email WHERE id = :id";
        $updateUser = $this->execute($sql, [
            'id' => $userId,
            'first_name' => $userInfo['first_name'],
            'last_name' => $userInfo['last_name'],
            'username' => $userInfo['username'],
            'email' => $userInfo['email'],
        ]);

        return $updateUser;
    }
}
