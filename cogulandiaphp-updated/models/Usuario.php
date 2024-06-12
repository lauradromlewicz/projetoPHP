<?php

require_once __DIR__ . '/../config/conexao.php';

class Usuario {
    public static function criar($nome, $email, $senha) {
        try {
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $hashed_password = password_hash($senha, PASSWORD_DEFAULT);
            $stmt->bindParam(':senha', $hashed_password);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Erro ao criar usuário: " . $e->getMessage();
            return false;
        }
    }

    public static function listar() {
        try {
            $conexao = Conexao::conectar();
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conexao->query("SELECT * FROM usuarios");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar usuários: " . $e->getMessage();
            return [];
        }
    }

    public static function atualizar($id, $nome, $email, $senha) {
        try {
            $conexao = Conexao::conectar();
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conexao->prepare("UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $hashed_password = password_hash($senha, PASSWORD_DEFAULT);
            $stmt->bindParam(':senha', $hashed_password);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Erro ao atualizar usuário: " . $e->getMessage();
            return false;
        }
    }

    public static function deletar($id) {
        try {
            $conexao = Conexao::conectar();
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conexao->prepare("DELETE FROM usuarios WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Erro ao deletar usuário: " . $e->getMessage();
            return false;
        }
    }

    public static function autenticar($email, $senha) {
        try {
            $conexao = Conexao::conectar();
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($senha, $usuario['senha'])) {
                return $usuario;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo "Erro ao autenticar usuário: " . $e->getMessage();
            return null;
        }
    }
}