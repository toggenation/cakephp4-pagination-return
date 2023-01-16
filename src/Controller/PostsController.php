<?php

declare(strict_types=1);

namespace App\Controller;

use App\Mailer\PostsMailer;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // $this->paginate = ['limit' => 3];

        $posts = $this->paginate($this->Posts);

        $limit = $this->request->getQuery('limit');
        // ?? $this->paginate['limit'];
        $page = $this->request->getQuery('page');


        $this->set(compact('posts', 'limit', 'page'));
    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('post'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $post = $this->Posts->newEmptyEntity();
        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));
                $mailer =  new PostsMailer();
                $mailer->setSubject('Hi Youtube');
                $mailer->setTo('james@toggen.com.au', "James McDonald");
                $mailer->deliver("This is a test of the mailer");

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $this->set(compact('post'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => [],
        ]);
        $page = $this->request->getQuery('page');

        $limit = $this->request->getQuery('limit');

        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));
                $redirect = ['action' => 'index'];
                if ($page) {
                    $redirect['?']['page'] = $page;
                }
                if ($limit) {
                    $redirect['?']['limit'] = $limit;
                }
                return $this->redirect($redirect);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $this->set(compact('post'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $post = $this->Posts->get($id);

        $page = $this->request->getData('page');

        $limit = $this->request->getData('limit');

        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }

        $paginationOptions = [];

        $redirect = ['action' => 'index'];

        if ($limit) {
            $paginationOptions += ['limit' => $limit];
            $redirect['?']['limit'] = $limit;
        }

        $posts = $this->paginate($this->Posts, $paginationOptions);

        $paging = $this->request->getAttribute('paging');

        if ($page > $paging['Posts']['pageCount']) {
            $page = $paging['Posts']['pageCount'];
        }

        if ($page) {
            $redirect['?']['page'] = $page;
        }

        return $this->redirect($redirect);
    }
}
